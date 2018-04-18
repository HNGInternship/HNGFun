<html>
	<head>
		<title>Random Color Generator</title>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
		<script type='text/javascript' src='Color.js'></script>
		<script type='text/javascript'>
			// Used jQuery because it's just easier that way
			jQuery(function($){
				var $tbody = $('tbody');
				// Creating Color
				$('#generate').click(function(){
					var hex = Color.random(),
						rgb = Color.hex2rgb(hex),
						html = $tbody.html(),
						row = [
							"<tr>",
								"<td class='block' bgcolor='"+hex+"'>&nbsp;</td>",
								"<td>"+hex+"</td>",
								"<td>"+rgb.join(',')+"</td>",
							"</tr>"
						].join('');

					$tbody.html( row + html );
				});
				$('#reset').click(function(){
					Color.reset();
					$tbody.html('');
				});
			});
		</script>
		<style type='text/css'>
			body { font-size: 10pt; }
			table { width: 400px; border: 2px solid black; margin: 5px 3px; }
			th {text-align: left;}
			td.block { border: 2px solid #989898; }
		</style>
	</head>
	<body>


		<!--
		Random Color Generator
		December 28, 2009
		Corey Hart @ http://www.codenothing.com
		-->


		<h1>Random Color Generator</h1>
		<button id="generate">Generate</button>
		<button id="reset">Reset</button>
		<table cellpadding='3' cellspacing='2'>
			<thead>
				<tr>
					<th width='30'>Color</th>
					<th>Hex</th>
					<th>RGB</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</body>
</html>
