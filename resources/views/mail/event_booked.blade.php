<!-- filepath: c:\xampp\htdocs\repositories\dpe-developer\simple-event-booking\backend\resources\views\mail\event_booked.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Booking Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .email-container {
      max-width: 600px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h1 {
      color: #007bff;
    }
    .details {
      margin-bottom: 20px;
    }
    .details p {
      margin: 5px 0;
    }
    .footer {
      text-align: center;
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="header">
      <h1>Event Booking Confirmation</h1>
    </div>
    <div class="details">
      <p>Hi {{ $user->name }},</p>
      <p>Thank you for booking your spot for the event. Here are the details:</p>
      <p><strong>Event Name:</strong> {{ $event->name }}</p>
      <p><strong>Date:</strong> {{ date('F d, Y h:i A', strtotime($event->date)) }}</p>
      <p><strong>Location:</strong> {{ $event->location }}</p>
    </div>
    <div class="footer">
      <p>If you have any questions, feel free to contact us.</p>
      <p>Thank you for choosing our service!</p>
    </div>
  </div>
</body>
</html>