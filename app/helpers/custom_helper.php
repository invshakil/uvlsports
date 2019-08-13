<?php

/*
 * @param
 * Words, Limit, End with
 * returns customized string
*/

function strLimit($value, $limit = 100, $end = '...')
{
    $limit = $limit - mb_strlen($end); // Take into account $end string into the limit
    $valuelen = mb_strlen($value);
    return $limit < $valuelen ? mb_substr($value, 0, mb_strrpos($value, ' ', $limit - $valuelen)) . $end : $value;
}


function defaultSeo($data, $pageName = null)
{
    // SEO
    if (!isset($data['image'])) {
        $data['image'] = asset('uvl-logo.png');
    }
    if (!isset($data['description'])) {
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
    }
    if (!isset($data['keyword'])) {
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
    }
    if (!isset($data['author'])) {
        $data['author'] = "https://www.facebook.com/1360157000709953";
    }
    return $data;
}