import React, {useEffect, useState} from "react"
import axios from "axios"
export default function List(){
    //state fakultas
    const [fakultas, setFakultas] = useState([]);
    //useeffect

    useEffect( () => {
        axios.get("https://laravel-mi5a.vercel.app/api/api/fakultas")
        .then( (response) => {
            console. log(response);
            setFakultas(response.data.result)
        })
    }, [] )
    return (
        <>
        <h2>List Fakultas</h2>
        </>
    )
}