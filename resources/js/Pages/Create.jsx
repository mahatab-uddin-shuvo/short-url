import React, { useState } from 'react';
import { router } from '@inertiajs/react' // We need to import this router for making POST request with our form
import { Button, Input } from "@material-tailwind/react";
import axios from 'axios';

export default function Create() {
    const [values, setValues] = useState();
    const [showVal, setShowVal] = useState();


    // We will use function below to get
    // values from form inputs
    const handleChange = (e) =>{
        let value = {...values};
        value[e.target.name] = e.target.value
        setValues(value);
    }


    // This function will send our form data to
    // store function of PostContoller
    function handleSubmit(e) {
        e.preventDefault()

        console.log(values)

        axios.post('/short-url',values)
        .then((res)=>{
            if(res.status == 200){
                setShowVal(res.data.shortUrl);
            }
        })

    }

    return (
        <>

            <div className="container mx-auto px-4">
            <h1>Your Link here</h1>
            <hr/>
            <br/>
                <form onSubmit={handleSubmit}>

                    <div className="flex w-72 flex-col items-end gap-6">
                        <Input size="sm" name="url" label="Enter input your link" onChange={handleChange}/>
                    </div>
                    <br/>
                    <Button type="submit">Button</Button>
                    <br/>
                    {showVal &&
                    <>
                        <p>Your shortner URL:  {showVal}</p>
                        Click here:  <a href={showVal}>{showVal}</a>
                        </>
                    }
                </form>
            </div>
        </>
    )
}
