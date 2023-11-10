
function dragStart(ev) {
    ev.dataTransfer.setData('text', ev.target.textContent);
    console.log(ev.dataTransfer);
  }
  function allowDrop(ev) {
    ev.preventDefault();
  }
  function drop(ev) {
    ev.preventDefault();
    const data = ev.dataTransfer.getData('text');
    console.log(data);
    document.querySelector('.myInput').value = data;
  }
  


  function signup(e){
    event.preventDefault()
    var name = document.querySelector('.name-signup').value
    var username = document.querySelector('.user-signup').value
    var pass = document.querySelector('.pass-signup').value
    console.log(username, pass);
    var user = {
      name:name,
      username: username,
      pass: pass

    }
    var json = JSON.stringify( user)
    localStorage.setItem(username, json)
    alert("Succesly")
  }
  function login(e){
    event.preventDefault()
    var username = document.querySelector('.user-login').value
    var pass = document.querySelector('.pass-login').value
    console.log(username, pass);
    var user = localStorage.getItem(username)
    var data = JSON.parse(user)
    if(user == null){
      alert("Sai username or password")
    } else if (username == data.username && pass == data.pass){
      alert("Đăng nhập thành công")
      setTimeout(function(){
        document.querySelector('.creat-form-login').style.display = 'none'
      },2000)
      document.body.style.overflow = 'auto'
    } else {
      alert("Sai username or password")
    }
  }





