import React, {useEffect, useState} from "react"
import axios from "axios"
export default function List(){
    //state fakultas
    const [mahasiswa, setMahasiswa] = useState([]);
    //useeffect

    useEffect( () => {
        axios.get("https://academic-mi5a.vercel.app/api/api/mahasiswa")
        .then( response => {
            console. log(response);
            setMahasiswa(response.data.data)//disesuaikan dari inspect
        })
    }, [] )
    return (
        <>
        <h2>List Mahasiswa</h2>
        <table className="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>npm</th>
                    <th>email</th>
                    <th>hp</th>
                    <th>alamat</th>
                </tr>
            </thead>
            <tbody>
                {mahasiswa.map( (data) => (
                <tr key={data.id}>
                    <td>{data.nama}</td>
                    <td>{data.npm}</td>
                    <td>{data.email}</td>
                    <td>{data.hp}</td>
                    <td>{data.alamat}</td>
                </tr>
                ) )}

            </tbody>
        </table>
        </>
    )
}