$(document).ready( function(){
  var cTime = new Date(), month = cTime.getMonth()+1, year = cTime.getFullYear(), day = cTime.getDay();

	theMonths = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

	theDays = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Vend", "Sam"];
	
	//Ma partie de code que j'ai complétée
	 for(var i=0; i< theDays.length; i++) {
	      events = [
          [
            day+"/"+month+"/"+year, 
            'Consulter le suivi', 
            '#', 
            '#177bbb', 
            ''
          ],
          ]
	 }

    $('#calendar').calendar({
        months: theMonths,
        days: theDays,
        events: events,
        popover_options:{
            placement: 'top',
            html: true
        }
    });
});
