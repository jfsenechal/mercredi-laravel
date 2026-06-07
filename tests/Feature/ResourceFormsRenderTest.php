<?php

declare(strict_types=1);

use App\Filament\Resources\Attendances\Pages\CreateAttendance;
use App\Filament\Resources\Children\Pages\CreateChild;
use App\Filament\Resources\Days\Pages\CreateDay;
use App\Filament\Resources\Guardians\Pages\CreateGuardian;
use App\Filament\Resources\HealthQuestions\Pages\CreateHealthQuestion;
use App\Filament\Resources\Instructors\Pages\CreateInstructor;
use App\Filament\Resources\Invoices\Pages\CreateInvoice;
use App\Filament\Resources\Organizations\Pages\CreateOrganization;
use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Reductions\Pages\CreateReduction;
use App\Filament\Resources\Schools\Pages\CreateSchool;
use App\Filament\Resources\SchoolGroups\Pages\CreateSchoolGroup;
use App\Filament\Resources\SchoolYears\Pages\CreateSchoolYear;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\User;

use function Pest\Livewire\livewire;

beforeEach(function (): void {
    $this->actingAs(User::factory()->create());
});

it('renders the restructured create form', function (string $page): void {
    livewire($page)->assertOk();
})->with([
    CreateChild::class,
    CreateGuardian::class,
    CreateInstructor::class,
    CreateOrganization::class,
    CreateSchool::class,
    CreateSchoolGroup::class,
    CreateSchoolYear::class,
    CreateHealthQuestion::class,
    CreateReduction::class,
    CreatePage::class,
    CreateDay::class,
    CreateAttendance::class,
    CreateInvoice::class,
    CreateUser::class,
]);
