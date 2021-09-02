$(document).ready(function () {
    // 8.CUSTOMIZED MAP START
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map("map", {
            center: [55.75985606898725, 37.61054750000002],
            zoom: 12
        });
        myMap.controls.add("zoomControl").add("typeSelector").add("mapTools");

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'London (честно)'
        }, {
            iconLayout: 'default#image',
            iconImageHref: '../images/location-pin.png',
            iconImageSize: [30, 30]
        }),
            myMap.geoObjects.add(myPlacemark);
    }
    // 8.CUSTOMIZED MAP END
});