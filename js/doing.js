var data = [{ 
             "question": "Can I park here?????????????",
             "options": ["Sorry, I did that.", "It's the same place.", "Only for half an hour."],
             "answer": "2"},
              {
            "question": "What colour will you paint the children's bedroom?",
            "options": ["I hope it was right.", "We can't decide.", "It wasn't very difficult."],
            "answer": "1"}, 
            {
            "question": "I can't understand this email.",
            "options": ["Would you like some help?", "Don't you know?","I suppose you can."],
            "answer": "0"
            },
            {
            "question": "I'd like two tickets for tomorrow night.",
            "options": ["How much did you pay?", "Afternoon and evening.","I'll just check for you."],
            "answer": "2"
            },
            {
            "question": "Shall we go to the gym now?",
            "options": ["I'm too tired.", "It's very good.","Not at all."],
            "answer": "0"
            },
            ];
function Redirect()
     {
              window.location="index.php";
           }
$(function()
{
  var title = "General";
      $('#title').append('<h1 class="badge badge-secondary text-wrap" style="font-size: 40px">'+
              title+'</h1>');
    var $form = $("#q_a"),
        $answers = $('#answers'),
        $group, $item;

      $.each(data, function(index, value) {
    $group = $("<ul>", {
      "id": "q" + index,
      "class": "question"
    }).appendTo($answers);  
    $group.before('<strong class="qContent">'+ (index+1) +'. ' + value.question + '</strong>');
    $item = [];   
    $.each(value.options, function(sub_index, sub_value) {
      $item[sub_index] = '<li><input id="q' + index + 'a' + sub_index +
       '" class="items" type="radio" name="answer' + index + 
       '" value="' + sub_index + '"><label for="q' + index + 'a' + sub_index + '">&nbsp' + 
       sub_value + '</label></li>';
    });
    $group.html($item.join(""));
    });
     
  $form.on("submit", function(e) {
    e.preventDefault();
   
     var correct=0;
    $.each($(this).serializeArray(), function(index, value) {
      var check = value.name.match(/\d/)[0],
       $q = $("#q" + check);
      if (data[check].answer === value.value) {correct++;} 
      });
      if (correct===0)
      {
        setTimeout('Redirect()',2000);
        swal("Oh...no!", "Your correct answers: "+ correct + ". Try again!", "error");
      }
      else
      {
        setTimeout('Redirect()',2000);
        swal({
          title: "Sweet!",
          text: "Correct answers " + correct
          });
      }

    });
    
})

