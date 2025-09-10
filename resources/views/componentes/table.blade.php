<table class="striped teal lighten-5" >
    <thead>
            <tr>
            @foreach ($data[0] as $field => $value)        
                
                <th>{{$field}}</th>
                
            @endforeach
            </tr>
    </thead>
    
    <tbody>
            @foreach ($data as $entity)
                
            <tr>
                @foreach ($entity as $value)        
                    <td>{{$value}}</td>  
                @endforeach
                
                <td >
                    <div style="display: flex;flex-direction: row;justify-content:space-evenly">
                        <form id="form-update" method="POST">
                            @foreach ($entity as $field => $value)        
                                <input type="hidden" name="{{$field}}" value="{{$value}}">  
                            @endforeach
                            <button class="btn"  type="submid">Editar</button>
                        </form>

                        <form id="form-delete" method="POST">
                            <input type="hidden" name="id" value="{{$entity["id"]}}">
                            <button class="btn" type="submid" >Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>