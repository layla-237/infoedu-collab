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

function checkNr(id) {
    var elem  = document.getElementById(id),
        value = elem.value;
        const color = elem.style.backgroundColor;

if (elem.classList.contains("green")) {
    elem.classList.remove("green");
    elem.classList.add("red");
fetch("../../fat1/comp/session_c_r.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(id)}`
  });

}else if (elem.classList.contains("red")) { 
    elem.classList.remove("red");
    elem.classList.add("green");
fetch("../../fat1/comp/session_c.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(id)}`
  });
}

}



  function toggleCompare(id, e) {
    if (e) e.stopPropagation();
    if (state.compareIds.has(id)) {
      state.compareIds.delete(id);
    } else {
      if (state.compareIds.size >= 3) { alert('PoÈ›i selecta maxim 3 licee pentru comparare.'); return; }
      state.compareIds.add(id);
      showToast( 'AdÄƒugat la comparare!');
    }
    renderCards();
  }

  function renderCompareBa() {
    const bar = document.getElementById('compareBar');
    const names = document.getElementById('compareBarNames');
    if (!state.compareIds.size) { bar.classList.remove('visible'); return; }
    bar.classList.add('visible');
    names.innerHTML = [...state.compareIds].map(id => {
      const l = getLiceuById(id);
      return `<div class="compare-bar-chip">${l ? l.name.replace('Colegiul NaÈ›ional ','CN ') : id} <button onclick="toggleCompare(${id})">âœ•</button></div>`;
    }).join('');
  }
