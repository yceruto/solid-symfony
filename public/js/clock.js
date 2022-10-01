let s = Snap(document.getElementById('clock'));

let seconds = s.select('#seconds'),
    minutes = s.select('#minutes'),
    hours = s.select('#hours'),
    rim = s.select('#rim'),
    face = {
        elem: s.select('#face'),
        cx: s.select('#face').getBBox().cx,
        cy: s.select('#face').getBBox().cy,
    },
    easing = function (a) {
        return a == !!a ? a : Math.pow(4, -10 * a) * Math.sin((a - .075) * 2 * Math.PI / .3) + 1;
    };

let sshadow = seconds.clone(),
    mshadow = minutes.clone(),
    hshadow = hours.clone(),
    shadows = [sshadow, mshadow, hshadow];

//Insert shadows before their respective opaque pals
seconds.before(sshadow);
minutes.before(mshadow);
hours.before(hshadow);

//Create a filter to make a blurry black version of a thing
let filter = Snap.filter.blur(0.1) + Snap.filter.brightness(0);

//Add the filter, shift and opacity to each of the shadows
shadows.forEach(function (el) {
    el.attr({
        transform: 'translate(0, 2)',
        opacity: 0.2,
        filter: s.filter(filter)
    });
});

function update (datetime) {
    let time = new Date(datetime);
    setHours(time);
    setMinutes(time);
    setSeconds(time);
}

function setHours (t) {
    let hour = t.getHours();
    hour %= 12;
    hour += Math.floor(t.getMinutes() / 10) / 6;
    let angle = hour * 360 / 12;
    hours.animate(
        { transform: 'rotate(' + angle + ' 244 251)' },
        100,
        mina.linear,
        function () {
            if (angle === 360) {
                hours.attr({ transform: 'rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + ')' });
                hshadow.attr({ transform: 'translate(0, 2) rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + 2 + ')' });
            }
        }
    );
    hshadow.animate(
        { transform: 'translate(0, 2) rotate(' + angle + ' ' + face.cx + ' ' + face.cy + 2 + ')' },
        100,
        mina.linear
    );
}

function setMinutes (t) {
    let minute = t.getMinutes();
    minute %= 60;
    minute += Math.floor(t.getSeconds() / 10) / 6;
    let angle = minute * 360 / 60;
    minutes.animate(
        { transform: 'rotate(' + angle + ' ' + face.cx + ' ' + face.cy + ')' },
        100,
        mina.linear,
        function () {
            if (angle === 360) {
                minutes.attr({ transform: 'rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + ')' });
                mshadow.attr({ transform: 'translate(0, 2) rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + 2 + ')' });
            }
        }
    );
    mshadow.animate(
        { transform: 'translate(0, 2) rotate(' + angle + ' ' + face.cx + ' ' + face.cy + 2 + ')' },
        100,
        mina.linear
    );
}

function setSeconds (t) {
    t = t.getSeconds();
    t %= 60;
    let angle = t * 360 / 60;
    //if ticking over to 0 seconds, animate angle to 360 and then switch angle to 0
    if (angle === 0) angle = 360;
    seconds.animate(
        { transform: 'rotate(' + angle + ' ' + face.cx + ' ' + face.cy + ')' },
        600,
        easing,
        function () {
            if (angle === 360) {
                seconds.attr({ transform: 'rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + ')' });
                sshadow.attr({ transform: 'translate(0, 2) rotate(' + 0 + ' ' + face.cx + ' ' + face.cy + 2 + ')' });
            }
        }
    );
    sshadow.animate(
        { transform: 'translate(0, 2) rotate(' + angle + ' ' + face.cx + ' ' + face.cy + 2 + ')' },
        600,
        easing
    );
}
