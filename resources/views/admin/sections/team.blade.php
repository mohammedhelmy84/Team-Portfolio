<!-- TEAM Section -->
<section id="team-section" class="mb-5">
    <h4 class="mb-3 text-secondary">أعضاء الفريق</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الدور</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team as $member)
                <tr>
                    <td><img src="{{ asset('storage/'.$member->photo) }}" width="60" class="rounded-circle"></td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>
                        <form action="{{ route('admin.team.delete', $member->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
