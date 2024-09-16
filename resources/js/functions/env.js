const env = (env, defaultValue = null) => {
    let _env = env;
    
    if(_env){
        if(import.meta.env[_env]){
            return import.meta.env[_env];
        }else{
            return defaultValue;
        }
    }else{
        return defaultValue;
    }
}

export default env;