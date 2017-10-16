/**
 * Created by georg on 19/1/2016.
 */
var end = new Date('1/30/2016 7:0 PM');
var now = new Date();
var distance = end - now;
while(distance < 0) {
    end.setDate(end.getDate() + 7);
    distance = end - now;
}


var _second = 1000;
var _minute = _second * 60;
var _hour = _minute * 60;
var _day = _hour * 24;
var timer;

function showRemaining() {
    var now = new Date();
    var distance = end - now;

    if (distance < 0 && distance >= -5400000) {
        document.getElementById('countdown-s').innerHTML = 'Σε εξέλιξη!';
        document.getElementById('time-left').setAttribute('title', 'H συνάντηση είναι σε εξέλιξη');

    } else if (distance < -5400000) {
        end.setDate(end.getDate() + 7);
        distance = end - now;
    }
    var days = Math.floor(distance / _day);
    var hours = Math.floor((distance % _day) / _hour);
    var minutes = Math.floor((distance % _hour) / _minute);
    var seconds = Math.floor((distance % _minute) / _second);

    document.getElementById('countdown').innerHTML = days + 'μ ';
    document.getElementById('countdown').innerHTML += hours + 'ω ';
    document.getElementById('countdown-s').innerHTML = minutes + 'λ ';
    document.getElementById('countdown-s').innerHTML += seconds + 'δ';
    document.getElementById('countdown-t').innerHTML = 'ακόμη ';

    document.getElementById('time-left').setAttribute('title', 'Επόμενη συνάντηση σε ' + days + ' ημέρες, ' + hours + ' ώρες και ' + minutes + ' λεπτά!');
}

timer = setInterval(showRemaining, 1000);