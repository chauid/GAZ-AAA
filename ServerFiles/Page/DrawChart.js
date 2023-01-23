//google.charts.load('current', {'packages':['corechart']});
//google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Time');
    data.addColumn('number', '시작(시가)');
    data.addColumn('number', '마지막(종가)');
    data.addColumn('number', '최저');
    data.addColumn('number', '최고');
    if(Unit == 0) for(var i=39;i>=0;i--)
    {
        if(i % 2 == 0) data.addRow([TimeSet0[i].toString(), LowPrice0[i], OpeningPrice0[i], ClosingPrice0[i], HighPrice0[i]]);
        else data.addRow(['', LowPrice0[i], OpeningPrice0[i], ClosingPrice0[i], HighPrice0[i]]);
    }
    else if(Unit == 1) for(var i=39;i>=0;i--)
    {
        if(i % 2 == 0) data.addRow([TimeSet1[i].toString(), LowPrice1[i], OpeningPrice1[i], ClosingPrice1[i], HighPrice1[i]]);
        else data.addRow(['', LowPrice1[i], OpeningPrice1[i], ClosingPrice1[i], HighPrice1[i]]);
    }
    else if(Unit == 2) for(var i=39;i>=0;i--)
    {
        if(i % 2 == 0) data.addRow([TimeSet2[i].toString(), LowPrice2[i], OpeningPrice2[i], ClosingPrice2[i], HighPrice2[i]]);
        else data.addRow(['', LowPrice2[i], OpeningPrice2[i], ClosingPrice2[i], HighPrice2[i]]);
    }
    // ['날짜', '저가', '시가', '종가', '고가']
    var options = {
        legend:'none',
        candlestick: {
            fallingColor: { strokeWidth: 0, fill: '#0000FF' },
            risingColor: { strokeWidth: 0, fill: '#FF0000' }
          },
        chartArea: {
            top: 10,
            left: 90,
            width: '85%',
            height: '85%'
        },
        tooltip: {
            trigger: 'none'
        },
        hAxis: {
            textStyle: { fontSize: 11 }
        },
        bar: {
            
        },
        colors: ['#505050']
    };
    var chart = new google.visualization.CandlestickChart(document.getElementById('Chart'));
    google.visualization.events.addListener(chart, 'onmouseover', function(e) {
        if(Unit == 0) {
            var open = OpeningPrice0[39-e.row];
            var close = ClosingPrice0[39-e.row];
            var low = LowPrice0[39-e.row];
            var high = HighPrice0[39-e.row];
            var time = TimeSet0[39-e.row];
        } else if(Unit == 1) {
            var open = OpeningPrice1[39-e.row];
            var close = ClosingPrice1[39-e.row];
            var low = LowPrice1[39-e.row];
            var high = HighPrice1[39-e.row];
            var time = TimeSet1[39-e.row];
        } else if(Unit == 2) {
            var open = OpeningPrice2[39-e.row];
            var close = ClosingPrice2[39-e.row];
            var low = LowPrice2[39-e.row];
            var high = HighPrice2[39-e.row];
            var time = TimeSet2[39-e.row];
        }
        $('#ShowInfo1').text("시작(시가): "+number(open));
        $('#ShowInfo2').text("마지막(종가): "+number(close));
        $('#ShowInfo3').text("최저: "+number(low));
        $('#ShowInfo4').text("최고: "+number(high));
        $('#Time').text(time);
    });
    chart.draw(data, options);
}