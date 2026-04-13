@extends('layouts.app')

@section('content')
    <div class="glass-panel" style="max-width: 600px; margin: 0 auto;">
        <h2 style="margin-bottom: 2rem;">Student Details</h2>

        <div style="margin-bottom: 1.5rem;">
            <label>Student ID</label>
            <div style="font-size: 1.25rem; font-weight: 500;">#{{ $student->id }}</div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label>Full Name</label>
            <div style="font-size: 1.25rem; font-weight: 500;">{{ $student->name }}</div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label>Email Address</label>
            <div style="font-size: 1.25rem;">{{ $student->email }}</div>
        </div>

        <div style="margin-bottom: 2rem;">
            <label>Course</label>
            <div><span style="background: rgba(255,255,255,0.1); padding: 6px 12px; border-radius: 12px; font-weight: 500;">{{ $student->course }}</span></div>
        </div>
        
        <div style="margin-bottom: 2rem; color: var(--text-muted); font-size: 0.875rem;">
            <p><strong>Created At:</strong> {{ $student->created_at->format('M d, Y h:i A') }}</p>
            <p><strong>Last Updated:</strong> {{ $student->updated_at->format('M d, Y h:i A') }}</p>
        </div>

        <div style="display: flex; gap: 1rem; border-top: 1px solid var(--surface-border); padding-top: 1.5rem;">
            <a href="{{ route('students.edit', $student->id) }}" class="btn">Edit Student</a>
            
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            
            <a href="{{ route('students.index') }}" class="btn btn-outline" style="margin-left: auto;">Back to List</a>
        </div>
    </div>
@endsection
