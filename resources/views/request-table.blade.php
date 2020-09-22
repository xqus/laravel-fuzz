<div>
<table class="w-full p-5 text-gray-700">
    <thead>
        <tr>
            <th class="text-left text-blue-900">Verb</th>
            <th class="text-left text-blue-900">Path</th>
            <th class="text-left text-blue-900">Respone Code</th>
            <th class="text-left text-blue-900">Execution Time</th>
            <th class="text-left text-blue-900">Datbase Queries</th>
            <th class="text-left text-blue-900">Memory Usage</th>
            <th class="text-left text-blue-900">Happened</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($requests as $request)
        <tr>
            <td>{{$request->request_method}}</td>
            <td>{{$request->request_path}}</td>
            <td>{{$request->response_code}}</td>
            <td>{{$request->execution_time}} ms</td>
            <td>{{$request->db_query_count}}</td>
            <td>{{$request->memory_peak}} MB</td>
            <td>{{$request->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $requests->links() }}
</div>
