var nom;
var value;

function drawChartRegion(nom,value) {
    

var region = document.getElementById('region');
var strRegion = region.options[region.selectedIndex].text;


    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [strRegion, 'Nombres de rapport' ,'COUCOU'],
            [nom, value ,70],
            ['Jeje', 02,20]
        ]);

        var options = {
            chart: {
                title: 'Statistiques sur les visiteurs :',
                subtitle: 'Trier par Region : '+strRegion ,
            }
        };

        var chart = new google.charts.Bar(document.getElementById('googleChart'));

        chart.draw(data, options);
    }

}

function drawChartVisiteur() {

var visiteur = document.getElementById('visiteur');
var strVisiteur = visiteur.options[visiteur.selectedIndex].text;

    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Statistiques', 'nombres de visiteurs', 'dépenses', 'Profit'],
            ['2014', 1000, 400, 200],
            ['2015', 1170, 460, 250],
            ['2016', 660, 1120, 300],
            ['2017', 1030, 540, 350]
        ]);

        var options = {
            chart: {
                title: 'Statistiques sur les visiteurs :',
                subtitle: 'Trier par le Visiteur : '+strVisiteur,
            }
        };

        var chart = new google.charts.Bar(document.getElementById('googleChart'));

        chart.draw(data, options);
    }

}