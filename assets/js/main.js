
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

  const close_signup = document.querySelector('.fa-xmark')
  close_signup.addEventListener('click',function(){
    document.querySelector('.creat-form-signup').style.display = 'none'
    document.body.style.overflow = 'auto'
  })

  const close_login = document.querySelector('.cloese-login')
  close_login.addEventListener('click',function(){
    document.querySelector('.creat-form-login').style.display = 'none'
    document.body.style.overflow = 'auto'
  })


  const btn_signup = document.querySelectorAll('.btn-signup-form')
  for (let i = 0; i < btn_signup.length; i++) {
    
    btn_signup[i].addEventListener('click',function(){
      document.querySelector('.creat-form-signup').style.display = ''
      document.body.style.overflow = 'hidden'
    })
    
  }

  const btn_login = document.querySelectorAll('.btn-login-form')
  for (let i = 0; i < btn_login.length; i++) {
    
    btn_login[i].addEventListener('click',function(){
      document.querySelector('.creat-form-login').style.display = ''
      document.body.style.overflow = 'hidden'
    })
    
  }


  // From Dang Ky _ btn Dang Nhap
const next_page_login = document.querySelector('.page-account-login')
next_page_login.addEventListener('click', function(){
  document.querySelector('.creat-form-login').style.display = ''
  document.querySelector('.creat-form-signup').style.display = 'none'
})

const next_page_signup = document.querySelector('.page-account-signup')
next_page_signup.addEventListener('click', function(){
  document.querySelector('.creat-form-signup').style.display = ''
  document.querySelector('.creat-form-login').style.display = 'none'
})
