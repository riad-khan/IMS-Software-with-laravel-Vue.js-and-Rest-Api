class Token{
    //***
    // validate token is it comes from login page or register page,if yes then it will valid or return false
    //**********************************************************
    //*********************************************************
    //***
    isValid(token){
        const payload = this.payload(token)
        if(payload){
            return payload.iss = 'http://127.0.0.1:8000/api/auth/login ' || 'http://127.0.0.1:8000/api/auth/register' ? true : false
        }
        return false
    }

    //***
    //in this part will take first part of the token using split function and return decode this payload function
    //*******************************************************************
    //***

    payload(token){
        const payload = token.split('.')[1]
        return this.decode(payload)
    }
    //***
    //now decode this split part with JSON parse method
    //*******************************************************************
    //***
    decode(payload){
        return JSON.parse(atob(payload))
    }
}

export default Token = new Token()
