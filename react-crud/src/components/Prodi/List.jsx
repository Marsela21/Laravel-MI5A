import React, {useEffect, useState} from "react"
import axios from "axios"
export default function List(){
    //state prodi
    const [prodi, setProdi] = useState([]);
    //useeffect

    useEffect( () => {
        axios.get("https://academic-mi5a.vercel.app/api/api/prodi")
        .then( response => {
            console. log(response);
            setProdi(response.data.data)//disesuaikan dari inspect
        })
    }, [] )
    return (
        <>
        <h2>List Prodi</h2>
        <table className="table">
            <thead>
                <tr>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                {prodi.map( (data) => (
                <tr key={data.id}>
                    <td>{data.nama}</td>
                </tr>
                ) )}
            </tbody>
        </table>
        </>
    )
}