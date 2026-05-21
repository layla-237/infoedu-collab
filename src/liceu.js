function renderPagination(totalPages) {
  const pag = document.getElementById("pagination");
  if (totalPages <= 1) {
    pag.innerHTML = "";
    return;
  }
  let html = `<button class="page-btn" onclick="goPage(${state.page - 1})" ${state.page === 1 ? "disabled" : ""}>‹</button>`;
  for (let i = 1; i <= totalPages; i++)
    html += `<button class="page-btn ${i === state.page ? "active" : ""}" onclick="goPage(${i})">${i}</button>`;
  html += `<button class="page-btn" onclick="goPage(${state.page + 1})" ${state.page === totalPages ? "disabled" : ""}>›</button>`;
  pag.innerHTML = html;
}
function goPage(n) {
  state.page = n;
  renderCards();
  window.scrollTo({ top: 0, behavior: "smooth" });
}

// ─── EVENTS ──────────────────────────────────────────────────────────────
document.getElementById("menuBtn").addEventListener("click", () => {
  document.getElementById("sidebar").classList.add("active");
  document.getElementById("overlay").classList.add("active");
});
["closeBtn", "overlay"].forEach((id) => {
  document.getElementById(id).addEventListener("click", () => {
    document.getElementById("sidebar").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
  });
});
function myFunction1() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s11";
  } else {
     sector = "s10";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction2() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s21";
  } else {
     sector = "s20";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction3() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s31";
  } else {
     sector = "s30";
  } 
    fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);
  }    

function myFunction4() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s41";
  } else {
     sector = "s40";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

}
function myFunction5() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s51";
  } else {
     sector = "s50";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction6() {
  if (document.getElementById("myCheck1").checked) {
     sector = "s61";
  } else {
     sector = "s60";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction7() {
  if (document.getElementById("myCheck1").checked) {
     sector = "p11";
  } else {
     sector = "p10";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction8() {
  if (document.getElementById("myCheck1").checked) {
     sector = "p21";
  } else {
     sector = "p20";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction9() {
  if (document.getElementById("myCheck1").checked) {
     sector = "p31";
  } else {
     sector = "p30";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction10() {
  if (document.getElementById("myCheck1").checked) {
     sector = "p41";
  } else {
     sector = "p40";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}
function myFunction11() {
  if (document.getElementById("myCheck1").checked) {
     sector = "p51";
  } else {
     sector = "p50";
  }
  fetch("../../fat1/comp/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(sector)}`
  });
  //alert("Sector 1 filter applied!");

          setTimeout(function() {
            window.location.href = "../../fat1/comp/liceu.php";
        }, 1000);

  
}