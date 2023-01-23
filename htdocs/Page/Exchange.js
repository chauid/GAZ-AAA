let oldVal; // 변화 이전 값
let CurrentPrice = 0;
setInterval(function() {
    $("#CoinTitle").load(location.href+" #CoinTitle");
    $("#CoinNews").load(location.href+" #CoinNews");
    $("#CoinList").load(location.href+" #CoinList");
    $("#TotalPrice").load(location.href+" #TotalPrice");
}, 1000);
setInterval(function() {
    UpdateCurrentPrice();
}, 200);
function UpdateCurrentPrice() {
    currentVal = CurrentPrice;
    Total = $("#CurrentPrice").text();
    Total = Number(Total) * Number(currentVal);
    Total = Total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    $("#TotalMoney").text(Total);
}
$("#ExCoinCount").on("propertychange change keyup paste input", function () {
    let currentVal = $(this).val();
    if(currentVal == oldVal) {
        return;
    }
    oldVal = currentVal;
    CurrentPrice = Number(currentVal);
    UpdateCurrentPrice();
});
function number(value) {
    value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    return value; 
}
function LoadUnit(value) {
    Unit = value;
    $('#ShowInfo1').text('');
    $('#ShowInfo2').text('');
    $('#ShowInfo3').text('');
    $('#ShowInfo4').text('');
    $('#Time').text('');
    drawChart();
}