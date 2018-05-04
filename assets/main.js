var decibels = 0;
var decibelsArray=[0];
var mic;
const socket = io('https://192.168.1.22:9091');
socket.on('connect', function () {
    console.log('connected');
  //  alert("Borne detectée, Bienvenue chez Becode");
  document.getElementById('borne').style.display="block";
});

mic = new p5.AudioIn();
mic.start();
var getDecibels = function () {
    var decibels = (mic.getLevel() * 1000) * 5;
    return decibels;
}

// console.log($('#soundBox'));
var changeBg = function (zz) {
    if (zz <= 75) {
        $('#soundBox').removeClass().addClass("green");
    }
    else if (zz > 75 && zz < 120) {
        $('#soundBox').removeClass().addClass("orange");
    }
    else {
        $('#soundBox').removeClass().addClass("red");
    }
}
var checkDecibels = function () {
    var decibels=getDecibels()
    changeBg(decibels);
    socket.emit('volume',{volume:decibels});
    decibelsArray.push(getDecibels());
}

setInterval(function(){
    checkDecibels();
    // console.log(decibelsArray);
}
, 100);

var getAverage=function(){
    let sum=0;
    let average =0;
    for(let i=0;i<decibelsArray.length;i++){
        sum+=decibelsArray[i];
    }
    average=(sum/decibelsArray.length);
    console.log (average);
    return (Math.floor(average));
}

$('#sendData').click(function(){
        // getAverage();
    let link ="/?page=son&moyenne="+getAverage();
        window.location=link;
    }
);
