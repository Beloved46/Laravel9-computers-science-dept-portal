<table>
    <thead>
        <tr>
            <th colspan="2" style="font-weight: bold">Course Code</th>
            <th style="font-weight: bold">Score</th>
            <th style="font-weight: bold">Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($studentR as $stud)
        <tr>
            <td colspan="2">{{ $stud->course_code }}</td>
            <td>{{ $stud->score }}</td>
            <td>{{ $stud->grade }}</td> 
        </tr>
        @endforeach
    
        
    </tbody>
</table>

{{-- <p colspan="4">Name: {{ Auth::user()->name }}  {{ Auth::user()->surname }}</p>
<p colspan="4">Matric Number: {{ Auth::user()->matric }}</p> --}}