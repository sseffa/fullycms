<?php

namespace Fully\Feeder;

/**
 * Class Feeder.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class Feeder
{
    /**
     * @var array
     */
    protected $settings = array(
        'title' => 'Fully CMS',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'link' => 'link',
    );

    /**
     * @param $entries
     * @param null $settings
     *
     * @return mixed
     */
    public function feed($entries, $settings = null)
    {
        if ($settings) {
            $this->settings = $settings;
        }

        $xml = new \SimpleXMLElement('<rss/>');
        $xml->addAttribute('version', '2.0');
        $channel = $xml->addChild('channel');
        $channel->addChild('title', $this->settings['title']);
        $channel->addChild('link', $this->settings['link']);
        $channel->addChild('description', $this->settings['description']);
        $channel->addChild('language', 'en-us');

        foreach ($entries as $entry) {
            $item = $channel->addChild('item');

            $item->addChild('title', $entry['title']);
            $item->addChild('link', $entry['link']);
            $item->addChild('description', $entry['description']);
        }

        return $xml->asXML();
    }
}
