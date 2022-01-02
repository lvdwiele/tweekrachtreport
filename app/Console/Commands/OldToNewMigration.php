<?php

namespace App\Console\Commands;

use App\Models\Report;
use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\QueryException;
use Psr\Log\LoggerInterface;

class OldToNewMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'old-db:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the old database to the new database.';

    private Connection $oldConnection;

    private Connection $newConnection;

    public function __construct(private DatabaseManager $databaseManager, private LoggerInterface $logger)
    {
        $this->oldConnection = $this->databaseManager->connection('mysql_old');
        $this->newConnection = $this->databaseManager->connection('mysql');

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // Make sure that there is a clean database where all the data is being migrated to.
        $this->call('migrate:fresh');

        // Seed the database with roles and powers.
        $this->call('db:seed');

        $this->convertCorePowers();
        $this->convertSupportPowers();
        $this->convertCorePowersSupportPowers();

        // The order of converts does matter!
        $this->convertUsers();
        $this->convertCompanies();
        $this->convertClients();
        $this->convertReports();
    }

    /**
     * Convert the core powers from the old database to the new database.
     *
     * @return void
     */
    private function convertCorePowers(): void
    {
        $corePowers = $this->oldConnection->query()
            ->select('*')
            ->from('krachten')
            ->get();

        $this->logger->info('Start core_powers migrations...');
        foreach ($corePowers as $corePower) {
            try {
                $this->newConnection->table('core_powers')
                    ->insert([
                        'id' => $corePower->id,
                        'type' => $corePower->type,
                        'card_number' => $corePower->kaart,
                        'power' => $corePower->kracht,
                        'description' => $corePower->tekst,
                    ]);
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finished core_powers migration...');
    }

    /**
     * Convert the support powers from the old database to the new database.
     *
     * @return void
     */
    private function convertSupportPowers(): void
    {
        $supportPowers = $this->oldConnection->query()
            ->select('*')
            ->from('hulpkrachten')
            ->get();

        $this->logger->info('Start support_powers migrations...');
        foreach ($supportPowers as $supportPower) {
            try {
                $this->newConnection->table('support_powers')
                    ->insert([
                        'id' => $supportPower->id,
                        'type' => $supportPower->type,
                        'power' => $supportPower->kracht,
                        'description' => $supportPower->tekst,
                    ]);
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finished support_powers migration...');
    }

    /**
     * Convert the core powers their support powers
     * from the old database to the new database.
     *
     * @return void
     */
    private function convertCorePowersSupportPowers(): void
    {
        $powers = $this->oldConnection->query()
            ->select('*')
            ->from('Krachten_Hulpkrachten')
            ->get();

        $this->logger->info('Start core_powers_support_powers migrations...');
        foreach ($powers as $power) {
            try {
                $firstSupportPowerId = DB::table('support_powers')
                        ->find($power->Hulpkracht1_1)->id ?? null;
                $secondSupportPowerId = DB::table('support_powers')
                        ->find($power->Hulpkracht1_2)->id ?? null;
                $firstSupportPowerId2 = DB::table('support_powers')
                        ->find($power->Hulpkracht2_1)->id ?? null;
                $secondSupportPowerId2 = DB::table('support_powers')
                        ->find($power->Hulpkracht2_2)->id ?? null;

                $this->newConnection->table('core_powers_support_powers')
                    ->insert([
                        'id' => $power->ID,
                        'first_core_power_id' => $power->Kernkracht1_ID,
                        'second_core_power_id' => $power->Kernkracht2_ID,
                        'first_support_power_id' => $firstSupportPowerId,
                        'second_support_power_id' => $secondSupportPowerId,
                        'first_support_power_id_2' => $firstSupportPowerId2,
                        'second_support_power_id_2' => $secondSupportPowerId2,
                    ]);
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finish core_powers_support_powers migrations...');
    }

    /**
     * Convert the users from the old database to the new database.
     *
     * @return void
     */
    private function convertUsers(): void
    {
        $users = $this->oldConnection->query()
            ->select('*')
            ->from('users')
            ->get();

        $this->logger->info('Start users migrations...');
        foreach ($users as $user) {
            try {
                $this->newConnection->table('users')
                    ->insert([
                        'id' => $user->id,
                        'role_id' => $user->right_id == 1 ? Role::ROLE_ADMIN : Role::ROLE_COACH,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone_number' => $user->telefoon,
                        'password' => $user->password,
                        'support_calculation' => $user->hulpberekening,
                        'email_verified_at' => $user->created_at,
                        'remember_token' => $user->remember_token,
                        'created_at' => $user->created_at,
                        'updated_at' => $user->updated_at,
                    ]);
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finish users migrations...');

        User::query()
            ->create([
                'role_id' => Role::ROLE_ADMIN,
                'name' => 'Ghost',
                'email' => 'ghost@tweekracht.nl',
                'password' => \Hash::make(config('services.admin-password')),
                'email_verified_at' => now(),
            ]);
    }

    /**
     * Convert the companies from the old database to the new database.
     *
     * @return void
     */
    private function convertCompanies(): void
    {
        $companies = $this->oldConnection->query()
            ->select('*')
            ->from('bedrijven')
            ->get();

        $ghostUser = User::query()
            ->where('email', 'ghost@tweekracht.nl')
            ->first();

        $this->logger->info('Start companies migrations...');
        foreach ($companies as $company) {
            try {
                $this->newConnection->table('companies')
                    ->insert([
                        'id' => $company->id,
                        'user_id' => $company->user_id ?? $ghostUser->id,
                        'name' => $company->bedrijfsnaam,
                        'email' => $company->email,
                        'address' => $company->adress,
                        'zip_code' => $company->postcode,
                        'place' => $company->plaats,
                        'phone_number' => $company->telefoon,
                        'created_at' => $company->created_at,
                        'updated_at' => $company->updated_at,
                    ]);
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finish companies migrations...');
    }

    /**
     * Convert the clients from the old database to the new database.
     *
     * @return void
     */
    private function convertClients(): void
    {
        $clients = $this->oldConnection->query()
            ->select('*')
            ->from('clientens')
            ->get();

        $this->logger->info('Start clients migrations...');
        foreach ($clients as $client) {
            $this->logger->info('Migrating client: ' . $client->id);
            try {
                $coach = User::query()
                    ->find($client->user_id);

                $ghostUser = User::query()
                    ->where('email', 'ghost@tweekracht.nl')
                    ->first();

                $this->newConnection->table('clients')
                    ->insert([
                        'id' => $client->id,
                        'user_id' => $coach->id ?? $ghostUser->id,
                        'company_id' => $client->bedrijven_id,
                        'email' => $client->email,
                        'first_name' => $client->voornaam,
                        'last_name' => $client->achternaam,
                        'address' => $client->adress,
                        'zip_code' => $client->postcode,
                        'place' => $client->woonplaats,
                        'phone_number' => $client->telefoon,
                        'created_at' => $client->created_at,
                        'updated_at' => $client->updated_at,
                    ]);

                if ($client->kernkracht1 !== null) {
                    $this->newConnection->table('client_core_powers')
                        ->insert([
                            'client_id' => $client->id,
                            'core_power_id' => $client->kernkracht1,
                        ]);
                }

                if ($client->kernkracht2 !== null) {
                    $this->newConnection->table('client_core_powers')
                        ->insert([
                            'client_id' => $client->id,
                            'core_power_id' => $client->kernkracht2,
                        ]);
                }

                if ($client->hulpkracht1 !== null) {
                    $this->newConnection->table('client_support_powers')
                        ->insert([
                            'client_id' => $client->id,
                            'support_power_id' => $client->hulpkracht1,
                        ]);
                }

                if ($client->hulpkracht2 !== null) {
                    $this->newConnection->table('client_support_powers')
                        ->insert([
                            'client_id' => $client->id,
                            'support_power_id' => $client->hulpkracht2,
                        ]);
                }
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }
        $this->logger->info('Finish clients migrations...');
    }

    /**
     * Convert the clients from the old database to the new database.
     *
     * @return void
     */
    private function convertReports(): void
    {
        $reports = $this->oldConnection->query()
            ->select([
                'rapports.*',
                'clientens.user_id',
            ])
            ->from('rapports')
            ->join('clientens', 'clientens.id', '=', 'rapports.id')
            ->get();

        $this->logger->info('Start reports migrations...');

        foreach ($reports as $report) {
            try {
                $this->logger->info('Migrating report: ' . $report->id);

                $oldUser = $this->oldConnection->table('users')
                    ->where('id', $report->user_id)
                    ->first();

                $newReport = new Report();

                $newReport->id = $report->id;
                $newReport->user_id = $oldUser !== null
                    ? $oldUser->id
                    : User::query()
                        ->where('email', 'ghost@tweekracht.nl')
                        ->first()->id;
                $newReport->client_id = $report->clienten_id;
                $newReport->created_at = $report->created_at;
                $newReport->updated_at = $report->updated_at;

                $newReport->saveQuietly();
            } catch (QueryException $exception) {
                $this->logger->error($exception->getMessage());
                dd($exception->getMessage());
            }
        }

        $this->logger->info('Finish reports migrations...');
    }
}
