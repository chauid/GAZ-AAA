setInterval(function() {
    $("#CoinUpdate").load(location.href+" #CoinUpdate");
}, 1000);
setInterval(function() {
    $("#UpCoins").load(location.href+" #UpCoins");
}, 1000);
setInterval(function(){
    $("#DownCoins").load(location.href+" #DownCoins");
}, 1000);
function close() {
    document.querySelector(".background").className = "background";
}
function close_again() {
    let date = new Date(Date.now() + 86400e3);
    date = date.toUTCString();
    document.cookie = "close=true; expires=" + date;
    close();
}
document.querySelector("#close").addEventListener("click", close);
document.querySelector("#close_box").addEventListener("click", close_again);