function myFunction() {
  // Declare variables 
  var input, filter, list, li, div1,div2,h5, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  list = document.getElementById("profile_list");
  li = list.getElementsByTagName("li");
  console.log(list);
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    var div1 = li[i].getElementsByTagName("div")[0];
    div2 = div1.getElementsByTagName("div")[0];
    h5 = div1.getElementsByTagName("h2")[0];   
    
    if (h5) {
      if (h5.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    } 
  }
}