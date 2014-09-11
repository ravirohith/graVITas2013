/**
 * AutoComplete Field - JavaScript Code
 *
 * This is a sample source code provided by fromvega.
 * Search for the complete article at http://www.fromvega.com
 *
 * Enjoy!
 *
 * @author fromvega
 *
 */

// global variables
var acListTotal   =  0;
var acListCurrent = -1;
var acDelay		  = 500;
var acURL		  = null;
var acSearchId	  = null;
var acResultsId	  = null;
var acSearchField = null;
var acResultsDiv  = null;

function setAutoComplete(field_id, results_id, get_url){

	// initialize vars
	acSearchId  = "#" + field_id;
	acResultsId = "#" + results_id;
	acURL 		= get_url;

	// create the results div
	//$("body").append('<div id="' + results_id + '"></div>');
	
	// register mostly used vars
	acSearchField	= $(acSearchId);
	acResultsDiv	= $(acResultsId);

	// reposition div
	
	// on blur listener
	acSearchField.blur(function(){ setTimeout("clearAutoComplete()", 200) });

	// on key up listener
	acSearchField.keyup(function (e) {

		// get keyCode (window.event is for IE)
		var keyCode = e.keyCode || window.event.keyCode;
		var lastVal = acSearchField.val();

		// check an treat up and down arrows

		// check for an ENTER or ESC
		if(keyCode == 13 || keyCode == 27){
			clearAutoComplete();
			return;
		}

		// if is text, call with delay
		setTimeout(function () {autoComplete(lastVal)}, acDelay);
	});
}

// treat the auto-complete action (delayed function)
function autoComplete(lastValue)
{
	// get the field value
	var part = acSearchField.val();
	$("#testing").html(part);
	// if it's empty clear the resuts box and return
	if(part == ''){
		clearAutoComplete();
		return;
	}

	// if it's equal the value from the time of the call, allow
	if(lastValue != part){
		return;
	}
	// get remote data as JSON
	$.getJSON(acURL + part, function(json){
		//$("#testing").html(json[0].name) ;
		// get the total of results
		var ansLength = acListTotal = json.length;
		//alert(json[0].name);
		// if there are results populate the results div
		//alert(ansLength);
		if(ansLength > 0){
			var newData = '';
			//PARSING OF JSON DATA TO BREAK UP THE 2D ARRAY
			//var obj = jQuery.parseJSON(json);
			//var waddup = JSON.parse(json);
			newData += "<table border='1' border-color='#ccc' cellspacing='0'>";
			newData += "<tr><th style='width:100px;'>Contingent No</th><th style='width:100px;'>College Name</th><th style='width:190px;'>Events Cost</th>"
			newData +="<th style='width:190px;'>Accomodation Cost</th><th style='width:190px;'></th>";
			newData +="<th style='width:190px;'>Delete</th></tr>";
			for(i=0; i < ansLength; i++)
			{
				newData += "<tr>";
				newData += "<td style='text-align:center;'>" + json[i].contingent + "</td>";
				newData += "<td style='text-align:center;'>" + json[i].college_name + "</td>";
				newData += "<td style='text-align:center;'>" + json[i].events_cost + "</td>";
				newData += "<td style='text-align:center;'>" + json[i].accomodation_cost +"</td>";
				newData += "<td style='text-align:center;'>" +"</td>";
				newData += "<td style='text-align:center;'>" + "<form method='post' action='search_delete.php'>";
				newData += "<input type='hidden' name='contingent' value='" + json[i].contingent +" '/><input type='submit' value='Delete' onclick=alertt()/>";
				newData	+= "</form>"+"</td>";
				newData +=	"</tr>";

			}
			newData += "</table>";
			// update the results div
			acResultsDiv.html(newData);
			acResultsDiv.css("display","block");


		} else {
			clearAutoComplete();
		}
	});
}

			
// clear auto complete box
function clearAutoComplete()
{
	acResultsDiv.html('');
	acResultsDiv.css("display","none");
}

