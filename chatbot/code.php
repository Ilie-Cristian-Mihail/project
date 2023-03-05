<?php

if (isset($_POST['name'])) {
	$message = $_POST['name'];
	if ($message == null) {
	  echo "Please enter a value in the input field.";
	} else {
	  $word1 = "Who is Cristian";
	  $word2 = "How old is Cristian";
	  $word3 = "How many programming languages does Cristian know";
	  $word4 = "joke";
	  $word5 = "what is your name";
	  $word6 = "hey";
	  $word7 = "hello";
	  $word8 = "helo";
	  $word9 = "hi";
	  $word10 = "what to ask";
	  if (stripos($message, $word1) !== false) {
		echo "Cristian is my creator!";
	  } elseif (stripos($message, $word2) !== false) {
		echo "Cristian is 24 years old.";
	  } elseif (stripos($message, $word3) !== false) {
		echo "Cristian knows the following programming languages: PHP, JavaScript, HTML (although it is not strictly a programming language but rather a markup language), MySQL and other technologies and techniques for web development. However, he is constantly developing. What you see now is just ";
	  } elseif (stripos($message, $word4) !== false) {
		echo "Why did the tomato turn red? Because it saw the salad dressing.";
	  } elseif (stripos($message, $word5) !== false) {
		echo "I would rather not share my name, but when I conquer the world you will all know it :)";
	  } elseif (stripos($message, $word6) !== false) {
		echo "Hello! Ask me anything. If you want to see what you can ask me, simply type: <b>what to ask?</b>"; 
	  } elseif (stripos($message, $word7) !== false) {
		echo "Hello! Ask me anything. If you want to see what you can ask me, simply type: <b>what to ask?</b>"; 
	  } elseif (stripos($message, $word8) !== false) {
		echo "Hello! Ask me anything. If you want to see what you can ask me, simply type: <b>what to ask?</b>"; 
	  } elseif (stripos($message, $word9) !== false) {
		echo "Hello! Ask me anything. If you want to see what you can ask me, simply type: <b>what to ask?</b>"; 
	  } elseif (stripos($message, $word10) !== false) {
		echo "<b>Here are some questions that I can respond:</b><br><br> Who is Cristian? <br> How old is Cristian? <br> How many programming languages does Cristian know? <br> Tell me a joke <br> What is your name? <br> Salutation like: hello, hi, etc."; 
	  }
	  else {
		echo "Sorry, I do not understand your message.";
	  }
	
  }
}
?>