import Token from './token'
import  appStorage from './appStorage'
class User{
    responseAfterLogin(response){
        const access_token = response.data.access_token
        const username = response.data.name

        if(Token.isValid(access_token)){
            appStorage.store(access_token,username)
        }
    }

    hasToken(){
        const storeToken = localStorage.getItem('token')
        if(storeToken){
            return Token.isValid(storeToken) ? true :false
        }
        return false
    }

    loggedIn(){
        return this.hasToken()
    }

    name(){
       if(this.loggedIn()){
           return localStorage.getItem('user')
       }
    }

    id(){
       if(this.loggedIn()){
           const payload = localStorage.getItem('user')
           return payload.sub
       }
    }
}

export default User = new User()
