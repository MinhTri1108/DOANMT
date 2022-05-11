var io = require("socket.io")(6001);
console.log("connect to port 6001");
io.on("error", function (socket) {
    console.log("no conncect");
});
io.on("connection", function (socket) {
    console.log("co nguoi vua ket noi");
});
var Redis = require("ioredis");
var redis = new Redis(1000);
// redis.on("connection", function (socket) {
//     console.log("co nguoi vua ket noi redis");
// });
redis.psubscribe("*", function (error, count) {});
redis.on("pmessage", function (partner, channel, message) {
    console.log(channel);
    console.log(message);
    console.log(partner);
    message = JSON.parse(message);
    io.emit(channel + ":" + message.event, message.data.message);
    console.log("sent");
});
