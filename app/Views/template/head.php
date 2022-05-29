
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle ?? 'Dashboard'; ?></title>
    <link rel="shortcut icon" href="/img/buleleng.png">

    <!-- Custom fonts for this template-->
    <link href="/startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- chart -->
	<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: ""
	},
	subtitles: [{
		text: ""
	}], 
	axisX: {
		title: "Kategori"
	},
	axisY: {
		title: "",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: true
	},
	axisY2: {
		title: "",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E",
		includeZero: true
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "APBN",
		showInLegend: true,      
		yValueFormatString: "#.### Peserta",
		dataPoints: [
			{ label: "Januari",  y: 218987 },
			{ label: "Februari", y: 220117 },
			{ label: "Maret", y: 219271 },
			{ label: "April",  y: 218362 },
			{ label: "Mei",  y: 217365 }
		]
	},
	{
		type: "column",
		name: "APBD",
		axisYType: "secondary",
		showInLegend: true,
		yValueFormatString: "#.### Peserta",
		dataPoints: [
			{ label: "Januari", y: 240293 },
			{ label: "Februari", y: 214866 },
			{ label: "Maret", y: 182064 },
			{ label: "April", y: 143119 },
			{ label: "Mei", y: 142958 }
		]
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
<!-- chart -->