// npm install express cors twilio

const express = require('express');
const cors = require('cors');
const twilio = require('twilio');

// get the SID

const accountSid = 'Your_account_id';
const authToken = 'Your_auth_token';

const client = new twilio(accountSid, authToken); 

const app = express(); // creating alias for express app

app.use(cors()); // block browser restriction( block the browser from restricting any data) for express app


// Welcome page for server
app.get('/', (req, res) => {
    res.send("Welcome to the Express Server");
})


// get text
app.get('/send-text', (req, res) => {
    // Get variable passed via query string
    const {recipient, textmessage} = req.query;

    // send text
    client.messages
    .create({
        body: textmessage,
        from: 'Your Number',
        to: recipient
    })
    .then(message => console.log(message.body));

})

// install nodemon 
// listen on port 4000
app.listen(4000, () => console.log("Running on port 4000"));