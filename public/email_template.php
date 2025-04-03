<?php
function getEmailTemplate($data)
{
  $colors = [
    'bg_0' => '#444652',
    'bg_1' => '#3b699b',
    'bg_2' => '#bc5400',
    'bg_3' => '#a83705',
    'bg_4' => '#61595e',
    'bg_5' => '#99908c'
  ];

  $bottomColor = $colors[$data['bottomColor']] ?? '#444652';
  $mainColor = $colors[$data['mainColor']] ?? '#444652';

  return "
  <html>
  <head>
    <title>Order Details</title>

    <style>
      .desk_preview {
        display: grid;
        max-width: 500px;
        width: 100%;
      }

      .desk_top {
        background-color: {$mainColor};
        border-radius: 4px;
        margin-bottom: 20px;
        height: 250px;
        width: 500px;
      }

      .hidden {
        display: none;
      }

      .desk_preview__title {
        font-size: 0.7em;
        opacity: 0.5;
        text-transform: uppercase;
        z-index: 3;
      }
    </style>
  </head>
  <body>
    <h1>Thank you for the order!</h1>

    <h2>Order Details</h2>

    <table border='0' cellpadding='10' cellspacing='0' width='100%' style='border-collapse: collapse; font-family: Arial, sans-serif; max-width: 600px;'>
      <tr><td><strong>Name</strong></td><td>{$data['name']}</td></tr>
      <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
      <tr><td><strong>Message</strong></td><td>{$data['message']}</td></tr>
      <tr><td><strong>Main Color</strong></td><td style='background-color: {$mainColor};'>{$data['mainColor']}</td></tr>
      <tr><td><strong>Bottom Color</strong></td><td style='background-color: {$bottomColor};'>{$data['bottomColor']}</td></tr>
      <tr><td><strong>Phone Holder</strong></td><td>{$data['phoneHolder']}</td></tr>
      <tr><td><strong>Tablet Holder</strong></td><td>{$data['tabletHolder']}</td></tr>
      <tr><td><strong>Vent Holes</strong></td><td>{$data['ventHoles']}</td></tr>
      <tr><td><strong>Whiteboard</strong></td><td>{$data['whiteboard']}</td></tr>
    </table>

    <div class='desk_preview'>
      <div class='desk_preview__title'>Вид сверху</div>

      <div class='desk_top'>
        <div class='desk_item desk_item__phone_holder bg_0'></div>
        <div class='desk_item desk_item__phone_holder desk_item__phone_holder--left bg_0'></div>
        <div class='desk_item desk_item__tablet_holder bg_0'></div>
        <div class='desk_item desk_item__tablet_holder desk_item__tablet_holder--left bg_0'></div>
        <div class='desk_item desk_item__whiteboard'></div>
        <div class='desk_item desk_item__whiteboard desk_item__whiteboard--left'></div>
        <div class='desk_holes'>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
          <span class='desk_holes__item bg_0'></span>
        </div>
      </div>

      <div class='desk_side_wrapper'>
        <div class='desk_preview__title'>Вид сбоку</div>
        <div class='desk_side'>
          <div class='desk_side__item bg_1'></div>
          <div class='desk_side__item bg_0'></div>
          <div class='desk_side__legs'>
            <img src='/assets/legs_with_controller-DtnBrAoy.png' alt=''>
          </div>
        </div>
      </div>
    </div>

    <p><a style='background-color: #183153; color: #fff; display: inline-block; padding: 10px 30px; text-decoration: none;' href='https://simplythedesk.net/'>www.simplythedesk.net</a></p>
  </body>
  </html>";
}
