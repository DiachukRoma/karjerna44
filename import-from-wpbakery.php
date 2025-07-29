<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SimpleXMLElement;

class ImportFromXmlWpbakery extends Command
{
    protected $signature = 'import:xml-wpbakery';
    protected $description = 'Імпортує сторінки з XML-файлу (WPBakery) у ACF Flexible Content';

    public function handle()
    {
        $path = base_path('web/app/themes/k44/storage/export.xml');

        if (!file_exists($path)) {
            $this->error('XML-файл не знайдено');
            return;
        }

        $xml = simplexml_load_file($path, 'SimpleXMLElement', LIBXML_NOCDATA);

        $namespaces = $xml->getNamespaces(true);
        $channel = $xml->channel;

        foreach ($channel->item as $item) {
            $wp = $item->children($namespaces['wp']);
            $content = (string) $item->children($namespaces['content'])->encoded;

            if ((string) $wp->post_type !== 'page') {
                continue;
            }

            $this->info("Імпорт: {$item->title}");

            $post_id = wp_insert_post([
                'post_title'   => (string) $item->title,
                'post_name'    => (string) $wp->post_name,
                'post_content' => '', // чистимо WPBakery
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ]);

            if (is_wp_error($post_id)) {
                $this->error("Помилка створення поста: " . $post_id->get_error_message());
                continue;
            }

            $acf_blocks = $this->parse_wpbakery_content($content);

            if (!empty($acf_blocks)) {
                update_field('content_blocks', $acf_blocks, $post_id);
                $this->info("✓ Імпортовано з ACF: {$post_id}");
            } else {
                $this->warn("✗ Без блоків: {$item->title}");
            }
        }

        $this->info('✅ Імпорт завершено.');
    }

    protected function parse_wpbakery_content(string $content): array
    {
        $blocks = [];

        preg_match_all('/\[vc_column_text\](.*?)\[\/vc_column_text\]/s', $content, $matches);

        foreach ($matches[1] as $text) {
            $blocks[] = [
                'acf_fc_layout' => 'text_block', // змінити на layout назву в ACF
                'text' => wpautop(trim($text)),
            ];
        }

        return $blocks;
    }
}
