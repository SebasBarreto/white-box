var questions = [
    {question:"¿Correo o número de celular?", pattern: /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/}, // Correo
    {question:"¿Contraseña?", type: "password"}
  ]
  
  ;(function(){
    
    var tTime = 100  // transition transform time from #login-form in ms
    var wTime = 200  // transition width time from #login-form in ms
    var eTime = 1000 // transition width time from inputLabel in ms
  
    // init
    var position = 0
    putQuestion()
  
    progressButton.addEventListener('click', validate)
    inputField.addEventListener('keyup', function(e){
      transform(0, 0) // ie hack to redraw
      if(e.keyCode == 13) validate()
    })
  
    // functions
    function putQuestion() {
      inputLabel.innerHTML = questions[position].question
      inputField.value = ''
      inputField.type = questions[position].type || 'text'  
      inputField.focus()
      showCurrent()
    }
    
    function done() {
      // add the h1 at the end with the welcome text
      var h1 = document.createElement('h1')
      h1.appendChild(document.createTextNode('Bienvenido!'))
      setTimeout(function() {
        loginForm.parentElement.appendChild(h1)     
        setTimeout(function() {h1.style.opacity = 1}, 50)
      }, eTime)
    }
  
    function validate() {
      questions[position].value = inputField.value
  
      if (!inputField.value.match(questions[position].pattern || /.+/)) wrong()
      else ok(function() {
        progress.style.width = ++position * 100 / questions.length + 'vw'
  
        if (questions[position]) hideCurrent(putQuestion)
        else hideCurrent(done)
      })
    }
  
    function hideCurrent(callback) {
      inputContainer.style.opacity = 0
      inputProgress.style.transition = 'none'
      inputProgress.style.width = 0
      setTimeout(callback, wTime)
    }
  
    function showCurrent(callback) {
      inputContainer.style.opacity = 1
      inputProgress.style.transition = ''
      inputProgress.style.width = '100%'
      setTimeout(callback, wTime)
    }
  
    function transform(x, y) {
      loginForm.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
    }
  
    function ok(callback) {
      loginForm.className = ''
      setTimeout(transform, tTime * 0, 0, 10)
      setTimeout(transform, tTime * 1, 0, 0)
      setTimeout(callback,  tTime * 2)
    }
  
    function wrong(callback) {
      loginForm.className = 'wrong'
      for(var i = 0; i < 6; i++) // shaking motion
        setTimeout(transform, tTime * i, (i%2*2-1)*20, 0)
      setTimeout(transform, tTime * 6, 0, 0)
      setTimeout(callback,  tTime * 7)
    }
  
  }())
  