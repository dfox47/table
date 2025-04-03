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

  $ventHoles = $data['ventHoles'] ? 'yes' : 'no';
  $deskLegs = $data['deskLegs'] ? 'yes' : 'no';

  return "
  <html>
  <head>
    <title>Order Details</title>

    <style>
      .desk_holes {
        display: block;
        height: 113px;
        margin: 10px auto 0;
        opacity: 0;
        padding: 0 0 0 6px;
        width: 168px;
      }

      .desk_holes--1 {
        opacity: 1;
      }

      .desk_holes__item {
        background-color: #fff;
        border-radius: 50%;
        display: inline-block;
        height: 9px;
        margin: 0 6px 2px 0;
        width: 9px;
      }

      .desk_item__whiteboard {
        background-color: #fff;
        border-radius: 6px;
        dispolay: none;
        height: 123px;
        width: 87px;
      }

      .desk_item__whiteboard--left-left,
      .desk_item__whiteboard--left-both,
      .desk_item__whiteboard--right-right,
      .desk_item__whiteboard--right-both {
        display: inline-block;
      }

      .desk_preview {
        display: grid;
        max-width: 500px;
        width: 100%;
      }

      .desk_preview__title {
        font-size: 0.7em;
        opacity: 0.5;
        text-transform: uppercase;
        z-index: 3;
      }

      .desk_legs {
        display: none;
      }

      .desk_legs--1 {
        display: block;
      }

      .desk_side__item {
        height: 8px;
        width: 500px;
      }

      .desk_side__item--1 {
        background-color: {$mainColor};
        border-radius: 6px 6px 0 0;
      }

      .desk_side__item--2 {
        background-color: {$bottomColor};
      }

      .desk_top {
        background-color: {$mainColor};
        border-radius: 4px;
        color: #fff;
        margin-bottom: 20px;
        height: 250px;
        width: 500px;
      }

      .footer_link,
      .footer_link:visited {
        background-color: #183153;
        color: #fff;
        display: inline-block;
        padding: 10px 30px;
        text-decoration: none;
      }

      .footer_link:hover {
        opacity: 0.8;
      }

      .img_phone_right {
        display: none;
      }

      .img_phone_right--both,
      .img_phone_right--right {
        display: block;
      }

      .img_phone_left {
        display: none;
      }

      .img_phone_left--both,
      .img_phone_left--left {
        display: block;
      }

      .img_tablet_left {
        display: none;
      }

      .img_tablet_left--both,
      .img_tablet_left--left {
        display: block;
      }

      .img_tablet_right {
        display: none;
      }

      .img_tablet_right--both,
      .img_tablet_right--right {
        display: block;
      }

      .wrapper {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <h1>Thank you for the order!</h1>

      <h2>Order Details</h2>

      <div class='desk_preview'>
        <div class='desk_preview__title'>Top</div>

        <table class='desk_top'>
          <tr>
            <td>
              <img
                class='img_tablet_left img_tablet_left--{$data['tabletHolder']}'
                src='https://simplythedesk.net/email/tablet_left.png'
                alt=''
              />
            </td>
            <td>
              <img
                class='img_phone_left img_phone_left--{$data['phoneHolder']}'
                src='https://simplythedesk.net/email/phone_left.png'
                alt=''
              />
            </td>
            <td
              colspan='2'
              rowspan='3'
              style='text-align: center; vertical-align: top'
            >
              <span class='desk_holes desk_holes--{$data['ventHoles']}'>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <br />
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <br />
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <br />
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <br />
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <br />
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
                <span class='desk_holes__item bg_0'></span>
              </span>
            </td>
            <td>
              <img
                class='img_phone_right img_phone_right--{$data['phoneHolder']}'
                src='https://simplythedesk.net/email/phone_right.png'
                alt=''
              />
            </td>
            <td>
              <img
                class='img_tablet_right img_tablet_right--{$data['tabletHolder']}'
                src='https://simplythedesk.net/email/tablet_right.png'
                alt=''
              />
            </td>
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>

          <tr>
            <td
              colspan='2'
              rowspan='2'
              style='vertical-align: bottom'
            >
              <span class='desk_item__whiteboard desk_item__whiteboard--left-{$data['whiteboard']}'></span>
            </td>
            <td
              colspan='2'
              rowspan='2'
              style='text-align: right; vertical-align: bottom'
            >
              <span class='desk_item__whiteboard desk_item__whiteboard--right-{$data['whiteboard']}'></span>
            </td>
          </tr>

          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>

        <div class='desk_preview__title'>Side</div>

        <div class='desk_side'>
          <div class='desk_side__item desk_side__item--1'></div>
          <div class='desk_side__item desk_side__item--2'></div>
          <div class='desk_side__legs'>
            <img
              class='desk_legs desk_legs--{$data['deskLegs']}'
              src='https://simplythedesk.net/email/legs.png'
              alt=''
            />
          </div>
        </div>
      </div>

      <table border='0' cellpadding='10' cellspacing='0' width='100%' style='border-collapse: collapse; font-family: Arial, sans-serif; max-width: 500px;'>
        <tr><td><strong>Name</strong></td><td>{$data['name']}</td></tr>
        <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
        <tr><td><strong>Message</strong></td><td>{$data['message']}</td></tr>
        <tr><td><strong>Main Color</strong></td><td style='background-color: {$mainColor};'>{$data['mainColor']}</td></tr>
        <tr><td><strong>Bottom Color</strong></td><td style='background-color: {$bottomColor};'>{$data['bottomColor']}</td></tr>
        <tr><td><strong>Phone Holder</strong></td><td>{$data['phoneHolder']}</td></tr>
        <tr><td><strong>Tablet Holder</strong></td><td>{$data['tabletHolder']}</td></tr>
        <tr><td><strong>Vent Holes</strong></td><td>{$ventHoles}</td></tr>
        <tr><td><strong>Whiteboard</strong></td><td>{$data['whiteboard']}</td></tr>
        <tr><td><strong>Legs</strong></td><td>{$deskLegs}</td></tr>
      </table>

      <p>
        <a
          class='footer_link'
          href='https://simplythedesk.net/'
          >www.simplythedesk.net</a
        >
      </p>
    </div>
  </body>
  </html>";
}
