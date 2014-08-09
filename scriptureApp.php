<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="favicon.ico.png">

		<title>Scripture Memorization App</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/boot-theme.mini.css" rel="stylesheet">
	</head>
	<body>
		<div class="container" style="">
			<div class="row">
				<h1>Scripture Memorization App</h1>
				<br />
				<p id="" title="Enter the text that you want to memorize, then adjust the slider.">
					Input:
					<textarea class="form-control" rows="12" id="input" autofocus="autofocus">This is the test, and another; and one more!</textarea>
				</p>
				<input class="btn btn-default" type="button" value="Go" id="goButton" style="float: right;" disabled="" />
				<p  id="">
					Total words entered : <span class="label label-primary" id="words"></span>
				</p>

				<br />
				<div>
					<input type="radio" name="removeType" value="firstLetter" checked="checked" />
					First Letter only
					<br />
					<input type="radio" name="removeType" value="word" />
					Hide entire word
				</div>
				<br />
				Adjust difficulty:
				<input class="form-control span2" id="range" type="range" min="1" max="10" style="width: 200px;" data-toggle="tooltip" data-placement="right" title="Move the slider to adjust the amount of words for which to hide or show only the first letter" />
				<br />
				<p id="">
					Slider value: <span class="label label-success" id="count"></span>
				</p>
				<p>
					Words to hide: <span class="label label-default" id="wordsToRemove"></span>
				</p>
				
				<br />
				<p>
					Output:
				</p>
				<p style="word-spacing: 20px;" class="well" id="">
					<span id="output"></span>
				</p>
			</div>
		</div>
	</body>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			
			$('#goButton').click(function(){
				var range = $('#range').val();
				$('#range').val() = 0;
				$('#range').val() = range;
			});
			
			$('#range').change(function() {
				// The value of the slider
				var range = $('#range').val();

				// Display the value of the slider to the user
				$('#count').html(range);

				// The initial value of the scripture passage
				var inputStr = $('#input').val();

				// Convert the scripture passage into an array of words
				var inputArr = inputStr.split(" ");

				// The number of words in the passage that will only have the first letter
				var wordsToRemove = (Math.floor(inputArr.length * range * 0.1));

				// Display the number of words in the passage
				$('#words').html(inputArr.length);

				// Display the number of words to remove to the user
				$('#wordsToRemove').html(wordsToRemove);
				

				// Create an array of numbers of the same length as the length of the word array
				var pool = [];
				for (var i = 0; i < wordsToRemove; i++) {
					pool[i] = i;
				}

				// Draw a unique random number from the pool of random numbers
				var getRand = function() {
					if (pool.length == 0) {
						return;
					}
					var index = Math.floor(pool.length * Math.random());
					var drawn = pool.splice(index, 1);
					return drawn[0];
				};

				/**** Run this algorithm for how many words to remove from the passage ***/				
				// If the difficult is maxed out, then hide or show first letter of word -- no need to do it randomly if all words will be affected
				if (range == 10) {
					for (var i = 0; i < wordsToRemove - 1; i++) {
						var word = inputArr[i];
						if ($('input[name=removeType]:checked').val() == "firstLetter") {
							var firstLetter = word.substring(0, 1);
							inputArr[i] = firstLetter;

						} else {
							inputArr[i] = " - ";
						}
					} // No need to run this algorithm if no words are affected
				} else if (wordsToRemove != 0) {
					for (var i = 0; i < wordsToRemove - 1; i++) {

						var random = getRand();

						var word = inputArr[random];

						if ($('input[name=removeType]:checked').val() == "firstLetter") {
							var firstLetter = word.substring(0, 1);

							inputArr[random] = firstLetter;
						} else {
							inputArr[random] = " - ";
						}
					}
				}

				// Convert the new array back to a paragraph
				var outputStr = "";
				for (var i = 0; i < inputArr.length; i++) {
					outputStr += inputArr[i] + " ";
				}

				// Display the output
				$('#output').html(outputStr);

			});
		});
	</script>
</html>