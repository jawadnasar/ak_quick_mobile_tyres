<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Project;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        Project::withTrashed()->each(function (Project $project) {
            $base = Str::slug($project->name);
            $slug = $base;
            $counter = 1;

            while (Project::withTrashed()->where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                $slug = $base . '-' . $counter++;
            }

            $project->update(['slug' => $slug]);
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
