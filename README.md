# SMS Sender App

This Android app sends SMS messages via Firebase Cloud Messaging (FCM). It listens for FCM messages
and sends an SMS based on the received data, including action, phone number, and message body. The
app also manages SMS permissions and integrates Firebase for messaging.

## Requirements

- **Android SDK 24+**: Minimum supported version is Android 7.0 (Nougat).
- **SMS Permission**: The app requests permission to send SMS messages on the device.
- **Firebase Setup**: Firebase Messaging is used for receiving remote messages.

## Setup

1. **Firebase Setup**: I added steps to download the `google-services.json` file and enable the *
   *Cloud Messaging API (Legacy)**, which is necessary for sending notifications from your PHP
   server.
2. **PHP Integration**: Instructions were added to configure the PHP file to send notifications
   using the Firebase Server Key and pass the FCM token and other necessary data like phone number
   and message to it.
3. **FCM Token**: Once the app runs, it logs the FCM token, which you will need to pass to the PHP
   backend when sending SMS messages.