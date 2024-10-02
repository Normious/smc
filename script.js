const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

// Ensure the navigation is hidden by default (if active class exists at start, remove it)
document.addEventListener("DOMContentLoaded", () => {
    navigation.classList.remove("active");
    menuBtn.classList.remove("active");
});

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});

// JavaScript for handling the search functionality
function searchDatabase() {
  const searchTerm = document.getElementById('search-input').value;

  if (searchTerm.length > 2) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `search.php?query=${searchTerm}`, true);
      xhr.onload = function() {
          if (this.status === 200) {
              document.getElementById('search-results').innerHTML = this.responseText;
          }
      };
      xhr.send();
  } else {
      document.getElementById('search-results').innerHTML = '';
  }
}

// JavaScript for handling the signup and login
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});