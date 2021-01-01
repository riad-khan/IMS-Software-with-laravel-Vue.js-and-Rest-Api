class appStorage{

  //first set item on local storage
  //********************************

storeToken(token){
    localStorage.setItem('token',token)
}

storeUser(user){
    localStorage.setItem('user',user)
}

// store item to storage
store(token,user){
    this.storeToken(token)
    this.storeUser(user)
}

//if wants to clear item
clear(){
    localStorage.removeItem('token')
    localStorage.removeItem('user')
}

//get item

    getToken(){
    localStorage.getItem('token')

    }
    getUser(){
        localStorage.getItem('user')
    }

}

export default appStorage = new appStorage();
