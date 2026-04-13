@extends('layouts.app')

@section('header-actions')
    <a href="{{ route('students.create') }}" class="btn">+ Add New Student</a>
@endsection

@section('content')
    <div class="glass-panel">
        @if($students->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td><strong>{{ $student->name }}</strong></td>
                            <td>{{ $student->email }}</td>
                            <td><span style="background: rgba(255,255,255,0.1); padding: 4px 8px; border-radius: 12px; font-size: 0.75rem;">{{ $student->course }}</span></td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <p>No students found. Add a new student to get started!</p>
            </div>
        @endif
    </div>
@endsection
