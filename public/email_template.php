<?php
function getEmailTemplate($data, $currentDate)
{
  return "
  <html>
  <head>
    <title>Order Details</title>
  </head>
  <body>
    <h1>Thank you for the order!</h1>
    <h2>Order Details</h2>

    <table border='0' cellpadding='10' cellspacing='0' width='100%' style='border-collapse: collapse; font-family: Arial, sans-serif;'>
      <tr style='background-color: #f2f2f2;'>
        <th style='border-bottom: 2px solid #ddd; text-align: left;'>Field</th>
        <th style='border-bottom: 2px solid #ddd; text-align: left;'>Details</th>
      </tr>
      <tr><td><strong>Date</strong></td><td>$currentDate</td></tr>
      <tr><td><strong>Name</strong></td><td>{$data['name']}</td></tr>
      <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
      <tr><td><strong>Message</strong></td><td>{$data['message']}</td></tr>
      <tr><td><strong>Bottom Color</strong></td><td>{$data['bottomColor']}</td></tr>
      <tr><td><strong>Main Color</strong></td><td>{$data['mainColor']}</td></tr>
      <tr><td><strong>Phone Holder</strong></td><td>{$data['phoneHolder']}</td></tr>
      <tr><td><strong>Tablet Holder</strong></td><td>{$data['tabletHolder']}</td></tr>
      <tr><td><strong>Vent Holes</strong></td><td>{$data['ventHoles']}</td></tr>
      <tr><td><strong>Whiteboard</strong></td><td>{$data['whiteboard']}</td></tr>
    </table>

    <p><a style='background-color: #183153; color: #fff; display: inline-block; padding: 10px 30px; text-decoration: none;' href='https://simplythedesk.net/'>www.simplythedesk.net</a></p>
  </body>
  </html>";
}
