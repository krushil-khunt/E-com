import express from 'express';

import { createServer } from 'http';

import { Server } from 'socket.io';

const app = express();

const http = createServer(app);

const io = new Server(http, {
    cors: {
        origin: "*"
    }
});

io.on('connection', (socket) => {

    console.log('User Connected');

    socket.on('new-product', (data) => {

        io.emit('product-added', data);

    });
    socket.on('new-order', (data) => {

    io.emit('order-received', data);

});

});


http.listen(4000, () => {

    console.log('Socket Server Running');

});