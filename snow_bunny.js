document.addEventListener("DOMContentLoaded", function() {
  const url = window.location.href;
  console.log("Current URL:", url);

  const newUrl = url.replace(/index\.html$/, '');
  console.log("New URL:", newUrl);

  if (url !== newUrl) {
      window.history.pushState({}, '', newUrl);
  } else {
      console.log("No replacement made.");
  }
});