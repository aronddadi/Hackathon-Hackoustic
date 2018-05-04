var decibels = 0;
var decibelsArray=[0];
var mic;
mic = new p5.AudioIn();
mic.start();
var getDecibels = function () {
    var decibels = (mic.getLevel() * 1000) * 5;
    return decibels;
}

// console.log($('#soundBox'));
var changeBg = function (zz) {
    if (zz <= 500) {
        $('#soundBox').removeClass().addClass("green");
    }
    else if (zz > 500 && zz < 900) {
        $('#soundBox').removeClass().addClass("orange");
    }
    else {
        $('#soundBox').removeClass().addClass("red");
    }
}
var checkDecibels = function () {
    changeBg(getDecibels());
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
